#!/usr/bin/env python3

from HAFASProvider import HAFASProvider
import json
from datetime import datetime
import getopt
import sys

optlist, args = getopt.getopt(sys.argv[1:], 'q:f:')
options = {}
for key,val in optlist:
    options[key] = val

if not '-q' in options:
    options['-q'] = "HB Kurfürstenallee"
if not '-f' in options:
    print ("Missing target file name param '-f'")
    exit(1)

h = HAFASProvider()
res,conns = h.get_stboard(query=options['-q'])

#tz = pytz.timezone('Europe/Berlin')

data = json.dumps({ 'info' : res, 'connections': conns }, ensure_ascii=False, sort_keys=True,
                  indent=4, separators=(',', ': '))

print("Writing to file " + options['-f'])

f = open(options['-f'],"w")
f.write(data)
f.close()


