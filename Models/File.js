const mongoose = require('mongoose')

const FileSchema = new mongoose.Schema({
    file_name:String,
    owner: {type: mongoose.Schema.Types.ObjectId, ref: 'User' }
})

module.exports = mongoose.model('File', UserSchema)