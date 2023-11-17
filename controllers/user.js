const Task = require("../Models/User");

const getAllUsers = (req, res) => {
  res.send("Get all Users");
};

const createUser = async (req, res) => {
  res.send("Create user");
};

const getUser = (req, res) => {
  res.send("get user");
};

const updateUser = (req, res) => {
  res.send("update user");
};

const deleteUser = (req, res) => {
  res.send("delete user");
};

module.exports = { getAllUsers, createUser, getUser, updateUser, deleteUser };
