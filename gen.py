# -*- coding: utf-8 -*-
import databaseManager
db=databaseManager.database("data")
for i in range(10):
	print db.produce_sentence().encode('utf-8')
