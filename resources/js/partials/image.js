// CLOUDINARY IMAGES
if (top.location.pathname === '/user/apartments/create' || top.location.href == $('#edit-apartment-form').attr('action') + '/edit') {

	const CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/team2boolean/image/upload'
	const CLOUDINARY_UPLOAD_PRESET = 'qlhraflf'

	const fileUpload = $('#file-upload')

	fileUpload.on('change', function (e) {
		const file = e.target.files[0]
		const formData = new FormData()
		formData.append('file', file)
		formData.append('upload_preset', CLOUDINARY_UPLOAD_PRESET)
		axios({
			url: CLOUDINARY_URL,
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
			data: formData
		}).then(function (res) {
			console.log(res.data.secure_url)
			const uri = res.data.secure_url
			$('#img').val(uri)
		}).catch(function (err) {
			console.log(err);
		})
	})

}