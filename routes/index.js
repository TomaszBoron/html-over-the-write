var express = require('express');
var router = express.Router();
var productsService = require('../services/products.service');

/* GET home page. */
router.get('/', async function(req, res, next) {
  const data = await productsService.getAll()
  const products = data.slice(0, 4)
  res.render('index', { title: 'Home', products });
});

module.exports = router;
