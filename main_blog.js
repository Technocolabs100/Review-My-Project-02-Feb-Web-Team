var firebaseConfig = {
  apiKey: "AIzaSyBup04JFBdGgyNQlxIP7H92qZ7KvGdqPvk",
  authDomain: "review-my-project-282af.firebaseapp.com",
  databaseURL: "https://review-my-project-282af-default-rtdb.firebaseio.com",
  projectId: "review-my-project-282af",
  storageBucket: "review-my-project-282af.appspot.com",
  messagingSenderId: "1090972319214",
  appId: "1:1090972319214:web:08592cdeda3db7f5cae2ff"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
    const storageService = firebase.storage();
    const storageRef = storageService.ref();
let BlogRef  = firebase.database().ref('Blogs');

document.getElementById('customFile').addEventListener('change', handleFileUploadChange);
document.getElementById('blogform').addEventListener('submit',submitForm);

let selectedFile;
function handleFileUploadChange(e){
     selectedFile = e.target.files[0];
  }
function submitForm(e)
{
    var imageurl;;
    e.preventDefault();
    console.log("Done");
    //var Imageurl;
    let heading = getInputVal('heading');
        const uploadTask = storageRef.child(`images/${selectedFile.name}`).put(selectedFile); //create a child directory called images, and place the file inside this directory
        uploadTask.on('state_changed', (snapshot) => {
        // Observe state change events such as progress, pause, and resume
        }, (error) => {
          // Handle unsuccessful uploads
          console.log(error);
        }, () => {
          
            uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                imageurl = downloadURL;
                saveBlogs(heading,description,imageurl);
                console.log('File available at', downloadURL); });

           // Do something once upload is complete
           console.log('success');
          
        });

    let description = getInputVal('description');
    
    
    document.querySelector('.alert').style.display = 'block';

    //Hide Alert Message After Seven Seconds(6)
    setTimeout(function() {
      document.querySelector('.alert').style.display = 'none';
    }, 7000);
  
    //Form Reset After Submission(7)
    document.getElementById('blogform').reset();
    console.log("done");
    
}
function getInputVal(id)
{
    return document.getElementById(id).value;
}
function saveBlogs(heading,description,imageurl)
{
    let  newBlogref = BlogRef.push();
    newBlogref.set({
        heading:heading,
        description:description,
        imageurl:imageurl
   

    });
}
