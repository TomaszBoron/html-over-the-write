var express = require('express');
var router = express.Router();

var apiUrl = 'https://lotrapi.co/api/v1/characters'

/* GET characters page. */
router.get('/', async function(req, res, next) {
  try {
    const response = await fetch(apiUrl);
    const data = await response.json();
    res.render('characters', { title: 'Postacie', characters: data.results });
  } catch (err) {
    res.status(500).send('Wystąpił błąd');
  }
});

/* GET characters page. */
router.get('/:id', async function(req, res, next) {
  const id = req.params['id']
  try {
    const response = await Promise.all([ 
      fetch(apiUrl),
      fetch(`${apiUrl}/${id}`)
    ])

    const data = await Promise.all([
      response[0].json(),
      response[1].json()
    ])

    res.render('characters', { title: 'Postacie', characters: data[0].results, character: data[1] });
  } catch (err) {
    res.status(500).send('Wystąpił błąd');
  }
});

module.exports = router;
