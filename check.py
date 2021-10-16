import pandas as pd
f=open('abc.csv','w')
drv = []
l = input("Enter the District")
#f = open('public.txt','r')


la = pd.read_csv("public.csv")
# print(la[la['Bengaluru City']])
for i in la:
    la1 = la[la['District']==l]
    
print(la1)
la1.to_csv('abc.csv',mode='a',index=False)
    
print("done")