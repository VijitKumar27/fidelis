import pandas as pd
import itertools as it
import matplotlib.pyplot as plt
print("ok")
f=open('public.csv','w')

driv = pd.read_csv('crime - Copy.csv',usecols=['States/UTs','District','Murder','Rape_total','Kidnapping & Abduction_Total','Dacoity_total','Robbery','Criminal Trespass/Burglary','Theft','Unlawful Assembly','Riots','Cheating','Forgery','Counterfeit_Total','Arson','Grievous Hurt','Dowry Deaths','Assault on Women with intent to outrage her Modesty','Sexual Harassment','Stalking','Importation of Girls from Foreign Country','Disclosure of Identity of Victims','Incidence of Rash Driving','HumanTrafficking','Total Cognizable IPC crimes'])

driv.to_csv('public.csv',index=False)

f.close()


#all_files=['data.csv','data1.csv','data2.csv','data3.csv']
#df = pd.concat(map(pd.read_csv,all_files))

#df.to_csv('final.csv',index=False)
'''
all_files=['data.csv','data1.csv','data2.csv','data3.csv']
li=[]
for filename in all_files:
    df = pd.read_csv(filename)
    li.append(df)

frame = pd.concat(li, axis=0)
frame.to_csv('final.csv')
f.close()'''
#f.write(driv)lap_csv('data2.cslap_lapse)
#f.write(driv)
