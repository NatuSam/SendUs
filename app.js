const express = require("express");
const app = express();
const user = require("./routes/user");
const connectDB = require("./db/connect.js");
require("dotenv").config();

app.use(express.json());
const port = 3000;

app.use(express.static('./public'))

app.use("/api/v1/uses", user);
const start = async () => {
  try {
    await connectDB(process.env.MONGO_URI);
    app.listen(port, console.log("Server Up"));
  } catch (error) {
    console.log(error);
  }
};

start();
