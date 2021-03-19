if(process.env.Node_Env!='production')//check state of the system
{
  require('dotenv').config();// organizes hierarchical configurations for your app deployments. It lets you define a set of default parameters, and extend them for different deployment environments (development, qa, staging, production, etc)
//when we  are development mode it just check set up complete or not
}
module.exports={
consumer_key:process.env.API_KEY,
consumer_secret:process.env.API_SECRET_KEY,
access_token:process.env.ACCESS_TOKEN,
access_token_secret:process.env.ACCESS_TOKEN_SECRET
}//here we just create an object,it uses an API from consumer to access token user or followers 