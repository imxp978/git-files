n = int(input('rows: '))
m = (n+1)/2

for i in range(n):
    if i <= m-1:
        print( (i)*' ' + (n-i*2)*'*' + (i)*' ' )
    else:
        print ( int(n-i-1)*' '+ (2*i -3)*'*' + (n-i-1)*' ' )