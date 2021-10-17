import sys
import pandas as pd
f=open('abc.csv','w')
drv = []
#l = str(sys.argv[1])
l="BengaluruCity"    

#f = open('public.txt','r')


la = pd.read_csv("public.csv")
# print(la[la['Bengaluru City']])

for i in la:
    la1 = la[la['District']==l]



pd.set_option('display.max_rows', None)
pd.set_option('display.max_columns', None)
pd.set_option('display.width', None)
pd.set_option('display.max_colwidth', -1)
print(la1)
print()
print()
if(int(la1['Murder'])>200):
    print("Number of murder cases is high. We recommend imposing a curfew beyond 8pm as the data shows increased murders in the evenings.")
else:
    print("Number of murder cases is manageable.")

####################################################
if(int(la1['Stalking'])>50):
    print("Number of Stalking cases is high. We recommend installing security cameras in strategic locations and ensuring that the streets are well lit at all times of the day.")
else:
    print("Number of Stalking cases is manageable.")
####################################################
if(int(la1['Kidnapping & Abduction_Total'])>350):
    print("Number of Kidnapping cases is high. We recommend Stationing officers at regular checkpoints in order to monitor the crowd and report suspicious activity. ")
else:
    print("Number of Kidnapping cases is manageable.")
####################################################

"""print(la1)"""
la1.to_csv('abc.csv',mode='a',index=False)
"""for i in la['Murder']:
    if((i>200)):
        print(i) 
     """