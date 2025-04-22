var express = require('express');
var router = express.Router();

var productsService = require("../services/products.service.js")
var store = []

/* GET cart listing. */
router.get('/', function(req, res, next) {
  res.render('cart', { title: 'Koszyk', cart: {
    products: store,
    sum: store.reduce((acc, obj) => acc + obj.price, 0),
  } });
});

router.post('/add/:id', async function(req, res, next) {
  try {
    const productId = req.params.id
    const addToCartProduct = await productsService.getById(productId)
    store.push(addToCartProduct)
    res.redirect('/cart')
  } catch (err) {
    res.status(200).send(err);
  }
});

module.exports = router;
