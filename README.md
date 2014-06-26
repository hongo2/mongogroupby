mongogroupby
============

MongoBD Group By PHP Code

take a mongo database and one collection, 
display the first sample document, on that database/collection

choose one or more keys to group by.

restult a list of grouped keys
also calculates cumulative ponderated percentage for analisys.

 

result example


mongogroupby.php?d=dealersDatabase&c=lt_dealers&f=address.stateCode

<html><head></head><body cz-shortcut-listen="true"><h1>MongoDB Group By and Counter PHP Code</h1><h1>usage: <a href="?d=DataBaseName&amp;c=CollectionName&amp;f=Key1,Key2">?d=DataBaseName&amp;c=CollectionName&amp;f=Key1,Key2</a> ie. Year,Make | parameter separated by comma ,  for nested keys use address.zipcode use dot . </h1> <h2>Combination Keys</h2><pre>Array
(
    [address.stateCode] =&gt; 1
)
</pre><h2>Data Structure Example - Use names from here to create new combination keys</h2><pre>Array
(
    [536a4397013214e37a000000] =&gt; Array
        (
            [_id] =&gt; MongoId Object
                (
                    [$id] =&gt; 536a4397013214e37a000000
                )

            [address] =&gt; Array
                (
                    [street] =&gt; 2004 Rte 112
                    [apartment] =&gt; 
                    [city] =&gt; Medford
                    [stateCode] =&gt; NY
                    [stateName] =&gt; New York
                    [county] =&gt; Suffolk
                    [country] =&gt; USA
                    [zipcode] =&gt; 11763
                    [latitude] =&gt; 40.808102
                    [longitude] =&gt; -73.002875
                )

            [attendingZipCodes] =&gt; 00501, 00544, 11705, 11706, 11713, 11715, 11716, 11717, 11719, 11720, 11722, 11727, 11730, 11733, 11738, 11739, 11741, 11742, 11749, 11751, 11752, 11754, 11755, 11760, 11763, 11764, 11766, 11767, 11769, 11770, 11772, 11776, 11777, 11778, 11779, 11780, 11782, 11784, 11786, 11787, 11788, 11789, 11790, 11792, 11794, 11796, 11901, 11931, 11932, 11933, 11934, 11935, 11940, 11941, 11942, 11946, 11947, 11948, 11949, 11950, 11951, 11952, 11953, 11955, 11956, 11958, 11959, 11960, 11961, 11962, 11963, 11967, 11968, 11969, 11970, 11972, 11973, 11975, 11976, 11977, 11978, 11980
            [contactinfo] =&gt; Array
                (
                    [dealer_website] =&gt; http://www.suzuki112.net/
                    [email_address] =&gt; 
                    [phone] =&gt; 
                )

            [locationId] =&gt; 12634
            [logicalName] =&gt; Suzuki112USA
            [make] =&gt; Used,Suzuki
            [name] =&gt; Suzuki 112 USA
            [operations] =&gt; Array
                (
                    [Wednesday] =&gt; 9:00 AM-9:00 PM
                    [Tuesday] =&gt; 9:00 AM-9:00 PM
                    [Thursday] =&gt; 9:00 AM-9:00 PM
                    [Saturday] =&gt; 9:00 AM-6:00 PM
                    [Friday] =&gt; 9:00 AM-9:00 PM
                    [Monday] =&gt; 9:00 AM-9:00 PM
                    [Sunday] =&gt; 10:00 AM-5:00 PM
                )

            [type] =&gt; ROOFTOP
        )

)
Array
(
    [address.stateCode] =&gt; 1
)
<h2>Count:9622 | Keys:26</h2><h3>n  ponderated%   cumulative%   item%  itemcount  key</h3>1 - 12.31% - 12.31% - 3.85% - (1184) <a href="/FL">/FL</a><br>2 - 12.11% - 24.41% - 7.69% - (1165) <a href="/NY">/NY</a><br>3 - 12.10% - 36.51% - 11.54% - (1164) <a href="/PA">/PA</a><br>4 - 7.64% - 44.15% - 15.38% - (735) <a href="/NC">/NC</a><br>5 - 6.70% - 50.85% - 19.23% - (645) <a href="/VA">/VA</a><br>6 - 6.61% - 57.46% - 23.08% - (636) <a href="/NJ">/NJ</a><br>7 - 6.59% - 64.05% - 26.92% - (634) <a href="/GA">/GA</a><br>8 - 4.96% - 69.01% - 30.77% - (477) <a href="/MA">/MA</a><br>9 - 4.47% - 73.48% - 34.62% - (430) <a href="/MD">/MD</a><br>10 - 3.85% - 77.32% - 38.46% - (370) <a href="/AL">/AL</a><br>11 - 3.64% - 80.96% - 42.31% - (350) <a href="/TN">/TN</a><br>12 - 3.56% - 84.53% - 46.15% - (343) <a href="/SC">/SC</a><br>13 - 3.54% - 88.07% - 50.00% - (341) <a href="/CT">/CT</a><br>14 - 2.10% - 90.17% - 53.85% - (202) <a href="/WV">/WV</a><br>15 - 1.91% - 92.08% - 57.69% - (184) <a href="/NH">/NH</a><br>16 - 1.73% - 93.81% - 61.54% - (166) <a href="/ME">/ME</a><br>17 - 1.59% - 95.40% - 65.38% - (153) <a href="/OH">/OH</a><br>18 - 1.04% - 96.44% - 69.23% - (100) <a href="/VT">/VT</a><br>19 - 1.03% - 97.46% - 73.08% - (99) <a href="/KY">/KY</a><br>20 - 0.91% - 98.38% - 76.92% - (88) <a href="/MS">/MS</a><br>21 - 0.82% - 99.20% - 80.77% - (79) <a href="/DE">/DE</a><br>22 - 0.72% - 99.92% - 84.62% - (69) <a href="/RI">/RI</a><br>23 - 0.03% - 99.95% - 88.46% - (3) <a href="/TX">/TX</a><br>24 - 0.02% - 99.97% - 92.31% - (2) <a href="/DC">/DC</a><br>25 - 0.02% - 99.99% - 96.15% - (2) <a href="/MI">/MI</a><br>26 - 0.01% - 100.00% - 100.00% - (1) <a href="/MO">/MO</a><br></pre></body></html>
