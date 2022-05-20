var express = require('express')
var request = require('request')
var http = require('http')
var app = express()

app.use(express.static('./scripts'))
app.set('view engine', 'ejs')
http.createServer(app).listen(3970)



function filtar(data, params) {
    let reg = new RegExp(params, 'i')
    return data.filter(a => {
        return Boolean(a['name'].match(reg))
    })
}

app.get('/list/:page?', (req, res)=>{
    let page = req.params.page || 1
    request(`https://api.fbi.gov/wanted/v1/list?page=${page}`, (err, res2, body)=>{
        let data = JSON.parse(body)['items'].map(a => {
            return {
                name : a.title,
                description : a['description'] || 'No description given',
                image : a['images'][0]['original']
            }
        })
        res.render('dyna_table', {data : req.query.data ? filtar(data, req.query.data) : data})
    })
})


app.get('/json-list', (req, res)=>{
    let page = req.query.page || 1
    request(`https://api.fbi.gov/wanted/v1/list?page=${page}`, (err, res2, body)=>{
        let data = JSON.parse(body)['items'].map(a => {
            return {
                name : a.title,
                description : a['description'] || 'No description given'
            }
        })
        res.send(req.query.data ? filtar(data, req.query.data) : data)
    })
})

