var express = require('express');
var router = express.Router();

/* GET htmx page. */
router.get('/', function(req, res, next) {
  res.render('htmx', { title: 'htmx' });
});

module.exports = router;
