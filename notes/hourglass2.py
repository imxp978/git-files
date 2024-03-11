n = int(input('rows: '))
m = (n+1)/2

for i in range(n):
    if i <= m-1:
        print( (i)*' ' + (n-i*2)*'*' + (i)*' ' )
    else:
        print ( (n-i-1)*' '+ (2*i -n+2)*'*' + (n-i-1)*' ' )