#From CSV to JSON
This script convert a CSV file into a JSON file, drop the empty cells and drop the double value in the same row.

##Usage
#####Use it is simple: 
It was thought for to be executed in the console.  
When you execute it (`php script.php`), the script will ask you the first key, its value and the second key, over that logic:

```
[
       {
           "key1": "value1",
           "key2": [
               "a",
               "b",
               "c",
               ...
           ]
       },
       {
           "key1": "value1",
           "key2": [
               "c",
               "e",
               "f",
               ...
           ]
       },
       {
           "key1": "value1",
           "key2": [
               "g",
               "a",
               "b",
               ...
           ]
       },
       ...
]
```

The script skip the first line (usually is the line of the name of the columns).

You can try the script with the file 'test.csv'.

Enjoy :-)