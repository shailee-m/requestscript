var x = ["http://rtb.nativeads.com/rtb?zone=49469", "http://us-east.ads.madgic.com/rtb/1733100/107327"]

for(var i=0;i<5000;i++){x.push(x[i%2==0?0:1])}; 
console.log(JSON.stringify(x))