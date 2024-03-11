
n = int(input('rows: '))
m = int((n-1)/2)
for i in range(m):      ##upper part
    print( (i) * ' ' + (n-i*2) * '*' + (i) * ' ')
    
print ( m * ' ' + '*' + m * ' ')         ##mid

for i in range(m):      ##lower part
    print( (m-i-1) * ' ' + (2*i+3) * '*' + (m-i) * ' ' )

# n = int(input('rows: '))
# m = n // 2  # 計算中間行數

# for i in range(n):
#     if i <= m:
#         print(' ' * (m - i) + '*' * (2 * i + 1))
#     else:
#         print(' ' * (i - m) + '*' * (2 * (n - i) - 1))
# print(m)
# for i in range(n):
#     if i <= m: 
#         print( (i)* ' ' + (n - i*2)* '*' + i * ' ')
#     elif i > m: 
#         print( (m-i-1)*' ' + (2*i+3) * '*' + (m-i) * ' ' )