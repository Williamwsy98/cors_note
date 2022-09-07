var sv = require('./service'),
crypto = require('crypto'),
fs = require('fs'),
// path = require('path')
index = 0,
wh = {
    mtype:1,
    mbuid:1
},
ud = {
    fsize:75484
},
jo = [{
    ft:'users',
    bt:'msg',
    op:'join',
    fk:'Uid',
    bk:'send',
    sym:'='
},{
    ft:'msg',
    bt:'members',
    op:'join',
    fk:'receive',
    bk:'mbgid',
    sym:'=',
}],
file = './hello.txt'
// fs.rename(file,'./tmp/exm.txt',()=>{
//     console.log(666)
// })
for (let i = 0; i < Infinity; i++) {
    console.log(i)
    if(i==20) break
}
// fs.exists(file,(exists)=>{
//     console.log(333,exists,555)
// })
// sv.getChat(2)
// .then((data)=>{
//     console.log(data.length)
// })
// sv.joinQuery(jo,wh)
// .then((data)=>{
//     console.log(data)
// })
// sv.update(wh,ud,'msg')
// .then(()=>{
//     console.log('ok')
// })
// let url = './src'
// fs.readdir(url,(err,data)=>{
//     console.log(data,4455)
// })
// let b = Buffer
// console.log(b,6677)
// let cp = require('crypto'),
//     pwd = '123456',
//     hash = cp.createHmac('',pwd).digest('hex')
// console.log(hash,6666)
// let i = 0,
// obj = {
//     num:i,
//     num1:i++
// }
// console.log(obj,2233)