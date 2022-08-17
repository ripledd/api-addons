  from requests import Request, Session
  import json

  API_KEY = '>>> APIC-KEY <<<'

  url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest'
  parameters = {'symbol': 'BTC'}
  headers = {'Accepts': 'application/json',
             'X-CMC_PRO_API_KEY': API_KEY}
  session = Session()
  session.headers.update(headers)

  response = session.get(url, params=parameters)
  data = json.loads(response.text)
  print ('Current Price (USD): ' + str(data['data']['BTC']['quote']['USD']['price']))
  print ('24h Volume (USD):    ' + str(data['data']['BTC']['quote']['USD']['volume_24h']))
  print ('Market Cap (USD):    ' + str(data['data']['BTC']['quote']['USD']['market_cap']))

  price = str(data['data']['BTC']['quote']['USD']['price'])
  market_cap = str(data['data']['BTC']['quote']['USD']['market_cap'])

  from datetime import datetime
  time = datetime.now()
  time = str(time)

  comp_data = price + market_cap

  import pycurl
  from urllib.parse import urlencode

  c = pycurl.Curl()
  #initializing the request URL
  c.setopt(c.URL, 'https://ripledd.com/dev/api/post.php')
  #the data that we need to Post
  post_data = {'spchr_auth_email': 'examplemail@mymail.com', 'spchr_auth_pw_hash': '1f3fff1fa07e998e86f7f7a27ae3', 'send_data': comp_data}
  # encoding the string to be used as a query
  postfields = urlencode(post_data)
  #setting the cURL for POST operation
  c.setopt(c.POSTFIELDS, postfields)
  # perform file transfer
  c.perform()
  #Ending the session and freeing the resources
  c.close()
