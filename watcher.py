import sys
import pycurl
import StringIO
import lxml.html
import datetime
import time
import random
import MySQLdb as db

# Огейм акк
login = ''
passwd = ''
# БД
server = 'localhost'
user = ''
password = ''
base = ''

# Формируем header
header = "Accept: text/html;q=0.9, text/plain;q=0.8, image/png, */*;q=0.5 Accept_charset: windows-1251, utf-8, utf-16;q=0.6, *;q=0.1 Accept_encoding: identity Accept_language: en-us,en;q=0.5 Connection: close Cache-Control: no-store, no-cache, must-revalidate Keep_alive: 300"

# Подключаемся к mysql
con = db.connect(server, user, password, base)
# Получаем данные с сервера
# Создали курсор
cur = con.cursor()
cur.execute("SELECT * FROM planets LEFT JOIN objects ON planets.ob_id = objects.id WHERE objects.is_active = 1")

def log(login, passwd, header):
    data = StringIO.StringIO()

    curl = pycurl.Curl()
    # Устанавливаем наш вариат клиента (браузера) и вид ОС
    curl.setopt(pycurl.USERAGENT, 'Opera/10.00 (Windows NT 5.1; U; ru) Presto/2.2.0')
    # Здесь устанавливаем URL к которому нужно обращаться
    curl.setopt(pycurl.URL, '')
    # Настойка опций cookie
    curl.setopt(pycurl.COOKIEJAR, '/home/cook.txt')
    # Возвращаем код в переменную, а не в поток
    curl.setopt(pycurl.HTTPHEADER , [header])
    # Установите эту опцию в ненулевое значение, если вы хотите, чтобы PHP завершал работу скрыто, если возвращаемый HTTP-код имеет значение выше 300. По умолчанию страница возвращается нормально с игнорированием кода.
    curl.setopt(pycurl.FAILONERROR, 1)
    # Устанавливаем значение referer - адрес последней активной страницы
    curl.setopt(pycurl.REFERER, 'http://www.ogame.ru/')
    # Максимальное время в секундах, которое вы отводите для работы CURL-функций.
    curl.setopt(pycurl.TIMEOUT, 10)
    # Устанавливаем метод POST
    curl.setopt(pycurl.POST, 1)
    # Ответственный момент здесь мы передаем наши переменные
    curl.setopt(pycurl.POSTFIELDS, 'kid=&uni=uni1.ogame.ruv=2&is_utf8=0&uni_url=&login=' + login + '&pass=' + passwd)
    # Установите эту опцию в ненулевое значение, если вы хотите, чтобы шапка/header ответа включалась в вывод.
    curl.setopt(pycurl.HEADER, 1)
    curl.setopt(pycurl.SSL_VERIFYPEER, 0); # не проверять SSL сертификат
    curl.setopt(pycurl.SSL_VERIFYHOST, 0); # не проверять Host SSL сертификата
    curl.setopt(pycurl.FOLLOWLOCATION, 1); # разрешаем редиректы
    curl.setopt(pycurl.WRITEFUNCTION, data.write)
    # Исполним запрос
    curl.perform()
    
    return (curl, data)

dt = datetime.datetime.now()
w = open('/home/snapshots/' + dt.strftime('%Y-%m-%d') + '__' + dt.strftime('%H-%M-%S') + '.html', 'w') 

# Выходим в огу
curl, data = log(login, passwd, header)
doc = lxml.html.document_fromstring(str(data.getvalue()))
title = doc.xpath('/html/body/title/text()')
tmp = str(title).split()    
        
# Цикл по всем планетам целей
for row in cur:
    # Гала/система/планета/есть ли луна
    gal = row[2]
    sys = row[3]
    plan = row[4]
    is_moon = row[5]
    inner_data = StringIO.StringIO()
    
    curl.setopt(pycurl.URL, '')
    curl.setopt(pycurl.POSTFIELDS, 'galaxy=' + str(gal) + '&system=' + str(sys))
    curl.setopt(pycurl.WRITEFUNCTION, inner_data.write)
    # Исполним запрос
    curl.perform()
    
    # Загрузили данные
    doc = lxml.html.document_fromstring(str(inner_data.getvalue()))
    # Вытащили title
    title = doc.xpath('/html/body/title/text()')
    tmp = str(title).split()
    
    # Если мы на главной, то пытаемся войти снова
    if tmp[0] == u'[u\'OGame':
        while tmp[0] == u'[u\'OGame':
            curl.close()
            curl, data = log(login, passwd, header)
            doc = lxml.html.document_fromstring(str(data.getvalue()))  
            title = doc.xpath('/html/body/title/text()')
            tmp = str(title).split()
        # Если пришлось перелогиниться - повторно выполним тот же запрос, что выше
        curl.setopt(pycurl.URL, '')
        curl.setopt(pycurl.POSTFIELDS, 'galaxy=' + str(gal) + '&system=' + str(sys))
        curl.setopt(pycurl.WRITEFUNCTION, inner_data.write)
        # Исполним запрос
        curl.perform()
        # Загрузили данные
        doc = lxml.html.document_fromstring(str(inner_data.getvalue()))
        # Вытащили title
        title = doc.xpath('/html/body/title/text()')
        tmp = str(title).split()  
 
    # Готовим html
    # Выбираем с помощью XPath данные по планете
    planet = doc.xpath('//*[@id="planet' + str(plan) + '"]/ul[2]/li[1]/text()')
    if not planet:
        planet = 'inact'
    else:
        tmp = str(planet).split()
        if tmp[1] == '\']':
            planet = '*'
        else:
            planet = tmp[1][0:2]
    # Выбираем с помощью XPath данные по луне
    moon = doc.xpath('//*[@id="moon' + str(plan) + '"]/ul[2]/li[1]/text()')
    if not moon:
        moon = 'inact'
    else:
        tmp = str(moon).split()
        if tmp[1] == '\']':
            moon = '*'
        else:
            moon = tmp[1][0:2]
    # Выбираем с помощью XPath данные по ПО
    derbis = doc.xpath('//*[@id="debris' + str(plan) + '"]/ul[2]/li/text()[1]')
    # Приводим данные по ПО к виду DF / No DF
    if not derbis:
        # derbis = 'No DF'
        met = 'No DF'
        kris = 'No DF'
    else:
        tmp = str(derbis).split()
        met = tmp[1]
        kris = tmp[3]
    # print(str(gal), str(sys), str(plan), str(planet), str(moon), met, kris, str(row[7]))
    w.write(inner_data.getvalue())
    inner_data.close()
    # Вставим данные этой итерации в БД. Да, неэффективно, но грамотнее писать некогда :)

    if planet == 'inact' and moon == 'inact':
        timer = 'inact'
    else:
        timer = 'active'  
    dt = datetime.datetime.now()
    cur.execute("INSERT INTO activity (obj_id, planet_id, activity_date, activity_time, timer, planet_timer, moon_timer, derbis_met, derbis_kris) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)", (row[1], row[0], dt.strftime('%Y-%m-%d'), dt.strftime('%H:%M:%S'), timer, planet, moon, str(met[0:-2]), str(kris[0:-2])))
    
    time.sleep(random.randint(1, 2))
    
# Освободим память
data.close()
curl.close()
w.close