# -*- coding: utf-8 -*-
import codecs
import os
import re
import random
class database:
	def __init__(self,directory):
		self.regex=re.compile(ur"(.+)、(.+)、(.+)、(.+)。?");
		self.when=[]
		self.where=[]
		self.who=[]
		self.what=[]
		self.directory=directory+"/"
		self.parse("when.txt",self.when)
		self.parse("where.txt",self.where)
		self.parse("who.txt",self.who)
		self.parse("what.txt",self.what)

	def parse(self,fname,destination):
		if os.path.exists(self.directory+fname) is not True:
			fp=codecs.open(self.directory+fname,"w",'utf-8')
			fp.close()

		fp=codecs.open(self.directory+fname,"r",'utf-8')
		for line in fp:
			if line!=u"": destination.append(line.rstrip())

		fp.close()


	def pick_elem_from(self,lst):
		return lst[random.randint(0,len(lst)-1)]

	def producable(self):
		if len(self.when)==0 or len(self.where)==0 or len(self.who)==0 or len(self.what)==0:
			return False
		else:
			return True

	def produce_sentence(self):
		if self.producable() is not True: return u"作れませんでした"
		return u""+self.pick_elem_from(self.when)+u"、"+self.pick_elem_from(self.where)+u"、"+self.pick_elem_from(self.who)+u"、"+self.pick_elem_from(self.what)+u"。"

	def append(self,appendstr):
		sresult=self.regex.search(appendstr)
		if sresult is None: return False
		when=sresult.group(1)
		where=sresult.group(2)
		who=sresult.group(3)
		what=sresult.group(4).rstrip(u"。")
		count=0
		if self.elem_exists(self.when,when) is not True:
			count+=1
			self.when.append(when)
		if self.elem_exists(self.where,where) is not True:
			count+=1
			self.where.append(where)
		if self.elem_exists(self.who,who) is not True:
			count+=1
			self.who.append(who)
		if self.elem_exists(self.what,what) is not True:
			count+=1
			self.what.append(what)

		return count

	def elem_exists(self,lst,item):
		ret=False
		for existing in lst:
			if existing==item:
				ret=True
				break

		return ret

	def save(self):
		self.save_file("when.txt",self.when)
		self.save_file("where.txt",self.where)
		self.save_file("who.txt",self.who)
		self.save_file("what.txt",self.what)

	def save_file(self,fname,lst):
		fp=codecs.open(self.directory+fname,"w",'utf-8')
		if len(lst)==0:
			fp.close()
			return

		for elem in lst:
			fp.write(elem+u"\n")

		fp.close()

