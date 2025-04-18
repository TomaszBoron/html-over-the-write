var express = require('express');
var router = express.Router();

/* GET characters page. */
router.get('/', async function(req, res, next) {
  try {
    const response = await fetch('https://lotrapi.co/api/v1/characters');
    const data = await response.json();
    // res.json(data);
    res.render('characters', { title: 'Postacie', people: data });
  } catch (err) {
    console.error('Błąd:', err);
    // res.status(500).send('Wystąpił błąd');
  }

});

module.exports = router;
