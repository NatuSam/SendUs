const express = require("express");
const router = express.Router();
const {
  getAllUsers,
  createUser,
  getUser,
  updateUser,
  deleteUser,
} = require("../controllers/user");

// app.get('/api/v1/User') - get all the users
// app.post('/api/v1/User') create a new user
//app.get('/api/v1/User/:id') get single user
// app.patch('/api/v1/User/:id') - update user
// app.delete('/api/v1/User/:id') - delete user

router.route("/").get(getAllUsers).post(createUser);
router.route("/:id").get(getUser).patch(updateUser).delete(deleteUser);

module.exports = router;
