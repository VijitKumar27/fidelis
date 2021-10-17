import matplotlib.pyplot as plt
import pandas as pd
import csv


with open('abc.csv', 'r') as f:
    d_reader = csv.DictReader(f)

    #get fieldnames from DictReader object and store in list
    headers = d_reader.fieldnames
print(headers)


data = pd.read_csv("abc.csv")
values=[]
cnt=2
for i in headers[2:]:
    values.append(data[headers[cnt]][0])
    cnt=cnt+1
print(values)

res = {}
for (key,val) in list(zip(headers[2:],values)):
    res[key] = val  
    
fig, ax = plt.subplots(figsize=(50, 20))

# Create bar plot
ab = ax.bar(headers[2:],values)

plt.savefig('ab.png')