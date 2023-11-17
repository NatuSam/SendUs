const mongoose = require('mongoose')

const ShareSchema = new mongoose.Schema({
    file_name: String,
    from: {type: mongoose.Schema.Types.ObjectId, ref: 'User'},
    to: {type: mongoose.Schema.Types.ObjectId, ref: 'User'},
})

module.exports = mongoose.model('Share', ShareSchema)