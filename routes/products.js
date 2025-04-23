var express = require('express');
var router = express.Router();

var productsService = require("../services/products.service.js")

/* GET products page. */
router.get('/', async function (req, res, next) {
  const name = req.query.name
  
  try {
    const products = await productsService.getAll();
    const productsFiltred = products.filter(product => product.title.includes(name || ""))
    res.render('products', { title: 'produkty', products: productsFiltred, searchQuery: name });
  } catch (err) {
    res.status(500).send('Wystąpił błąd');
  }
});

/* GET product page. */
router.get('/:id', async function (req, res, next) {
  const id = req.params['id']
  try {
    const response = await Promise.all([
      productsService.getAll(),
      productsService.getById(id)
    ])
    res.render('product-details', { title: 'produkt', products: response[0], productDetail: response[1] });
  } catch (err) {
    res.status(500).send('Wystąpił błąd', err);
  }
});

module.exports = router;
