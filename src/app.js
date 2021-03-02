const express = require("express");
const path = require("path");
const app = express();
require("./db/conn");
const Register = require("./models/registers");

const port = process.env.PORT || 3000;

const static_path = path.join(__dirname, "../");
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(express.static(static_path));


app.get("/", (req, res) => {
    res.render("index")
});

app.get("/signup", (req, res) => {
    res.render("signup");
})
app.get("/login", (req, res) => {
    res.render("login");
})

app.post("/signup", async(req, res) => {
    try {
        const password = req.body.password;
        const cpassword = req.body.cpassword;
        if (password === cpassword) {
            const registerUser = new Register({
                name: req.body.name,
                email: req.body.email,
                password: password,
                cpassword: cpassword
            })

            const registered = await registerUser.save();
            res.status(201).render("index");
        } else {
            res.send("passwords are not matching");
        }
    } catch (error) {
        res.status(400).send(error);
    }
})

app.post("/login", async(req, res) => {
    try {

        const name = req.body.name;
        const password = req.body.password;

        const useremail = await Register.findOne({ name: name });

        if (useremail.password === password) {
            res.status(201).render("index");
        } else {
            res.send("invalid login details");
        }
    } catch (error) {
        res.status(400).send("invalid login details");
    }
});

app.listen(port, () => {
    console.log(`server is running at port no ${port}`);
})
