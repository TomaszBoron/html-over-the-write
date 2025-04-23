var express = require('express');
var router = express.Router();

var productsService = require("../services/products.service.js")
var store = []
var clients = []

function addToastEvent(title) {
  const message = `
    <turbo-stream action="append" target="cart-success">
        <template>
            <div class="cursor-pointer text-white text-right">
                <div class="bg-green-500 text-white px-8 py-6 rounded-lg shadow-lgz-50 mb-3">
                    <p class="text-sm">${new Date().toLocaleTimeString()}<p>
                    <p class="font-bold text-xl">${title}</p>
                    <p>Dodany do koszyka</p>
                </div>
            </a>
        </template>
    </turbo-stream>
  `;
  clients.forEach(client =>
    client.write(`data: ${message.replace(/\n/g, '')}\n\n`)
  );
}

function updateCounterEvent(counter) {
  const message = `
    <turbo-stream action="update" target="cart-counter">
        <template>
          <span class="size-5 w-auto rounded-full bg-sky-500 text-center text-white p-1">${counter}</span>
        </template>
    </turbo-stream>
  `;
  clients.forEach(client =>
    client.write(`data: ${message.replace(/\n/g, '')}\n\n`)
  );
}

/* GET cart listing. */
router.get('/', function(req, res, next) {
  res.render('cart', { title: 'Koszyk', cart: {
    products: store,
    sum: store.reduce((acc, obj) => acc + obj.price, 0),
  } });
});

router.post('/add/:id', async function(req, res, next) {
  res.type('text/vnd.turbo-stream.html');
  try {
    const productId = req.params.id
    const product = await productsService.getById(productId)
    
    store.push(product)

    addToastEvent(product.title)
    updateCounterEvent(store.length)

    res.status(200).send();
  } catch (err) {
    res.status(500).send(err);
  }
});

router.get('/events', function(req, res, next) {
  res.setHeader('Content-Type', 'text/event-stream');
  res.setHeader('Cache-Control', 'no-cache');
  res.setHeader('Connection', 'keep-alive');
  res.flushHeaders();

  clients.push(res);

  updateCounterEvent(store.length)
  
  req.on('close', () => {
    clients = clients.filter(client => client !== res);
  });
});

module.exports = router;
