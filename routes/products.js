var express = require('express');
var router = express.Router();

var productsService = require("../services/products.service.js")

/* GET products page. */
router.get('/', async function(req, res, next) {
  try {
    const products = await productsService.getAll();
    res.render('products', { title: 'produkty', products });
  } catch (err) {
    res.status(500).send('Wystąpił błąd');
  }
});

/* GET product page. */
router.get('/:id', async function(req, res, next) {
  const id = req.params['id']
  try {
    const response = await Promise.all([ 
      productsService.getAll(),
      productsService.getById(id)
    ])

    const data = await Promise.all([
      response[0].json(),
      response[1].json()
    ])

    res.render('products', { title: 'produkty', products: data[0], productDetail: data[1] });
  } catch (err) {
    res.status(500).send('Wystąpił błąd');
  }
});

module.exports = router;
