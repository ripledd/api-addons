#code to get value


comp_data = "value"


# Send/post data in Ripledd via channel

import pycurl
from urllib.parse import urlencode

c = pycurl.Curl()
c.setopt(c.URL, 'https://ripledd.com/dev/api/post.php')

# Important!(set values and configure account's log in details, email and password with sha256 encryption.)
post_data = 
{'spchr_auth_email': 'examplemail@mymail.com', 
 'spchr_auth_pw_hash': 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 
 'send_data': comp_data
}
# Important!

postfields = urlencode(post_data)
c.setopt(c.POSTFIELDS, postfields)
c.perform()
c.close()
