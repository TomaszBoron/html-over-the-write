var express = require('express');
var router = express.Router();

/* GET about page. */
router.get('/', function(req, res, next) {
  res.render('about', { title: 'Kontakt' });
});

router.post('/', function(req, res, next) {
  const { message } = req.body
  res.setHeader("Content-Type", "text/html")
  res.type('text/vnd.turbo-stream.html');
  res.send(`
    <turbo-stream action="append" target="messages">
      <template>
        <div id="message_1">
          ${message}
        </div>
      </template>
    </turbo-stream>
  `);
});

module.exports = router;
