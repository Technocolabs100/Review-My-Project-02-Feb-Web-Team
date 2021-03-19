const sharehub = {
    consumer_key: process.env.CONSUMER_KEY,//check under event if user there or not
    consumer_secret: process.env.CONSUMER_SECRET,//private key
    access_token: process.env.ACCESS_TOKEN,//allow excess token
    access_token_secret: process.env.ACCESS_TOKEN_SECRET,
    timeout_ms: 60 * 1000 // optional HTTP request timeout to apply to all requests.
  };
  
  module.exports = {
    sharehub,
    userName: process.env.USERNAME
  };