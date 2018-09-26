# -*- coding: utf-8 -*-
import sys
import databaseManager
if len(sys.argv)!=2:
	print "Usage: python reg.py appendstr"
	sys.exit(0)


db=databaseManager.database("data")
sentence=sys.argv[1].strip('"')
ret=db.append(sentence.decode('utf-8'))
if ret is False:
	print "すいません！「%s」では、覚え方が分かりませんでした！" % sys.argv[1]
elif ret==0:
	print "すでに全部知っていました！"
else:
	print "知らなかったことを%dつ覚えました！" % ret

db.save()
