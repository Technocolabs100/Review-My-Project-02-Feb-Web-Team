const  share=require('share');
const  axios=require('axios');//import package to fetch and save data
const configurationcheck=requre('./CONFIGURATIONCHECK');//import config file here
const  T=new Twit(config);//import config as an object
let currentFollowersCount;
 const  getFollowersCount=()=>{
  const  params={
  const  params={ screen_name:'user'
T.get('users/show,params,(err,data,response)=>{
   if(err)
    {
       console.log(err)
       }
    else{
       currentFollowersCount=data.followers_count;
console.log(currentFollowersCount);
updateDisplayName()
}
})
}
setInterval(getFollowerscount,2000)
const updateDisplayName=()=>{
 const params={
  screen_name:user | ${currentFollowersCount} Followers

T.post('account update_profile,params,(err,data,response)=>{
 if(err)
{
  console.log(err)
}
else{
console.log('display name updated')
}
})
}
console.log('server is started');
