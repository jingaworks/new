import Errors from './Errors';

class Form {
  
	/**
	 * Create a new Form instance.
	 * 
	 * @param {object} data 
	 */
	constructor(data) {
		this.originalData = data;

		for (let field in data) {
			this[field] = data[field];
		}

		this.errors = new Errors();
	}


	/**
	 * Fetch all relevant data for the form.
	 */
	data() {
		let data = {};
		for (let property in this.originalData) {
			data[property] = this[property];
		}

		return data;
	}


	/**
	 * Reset the form fields.
	 */
	reset() {
		for (let field in this.originalData) {
			this[field] = '';
		}
		
		this.errors.clear();
	}


	/**
	 * Submit the form.
	 * 
	 * @param {string} requestType 
	 * @param {string} url 
	 */
	submit(requestType, url, redirect = null) {
		return new Promise((resolve, reject) => {
			axios[requestType](url, this.data())
				.then(response => {
					this.onSuccess(response.data, redirect);

					resolve(response.data);
				})
				.catch(error => {
					this.onFail(error.response.data.errors);

					reject(error.response.data.errors);
				})
		});
	}

	/**
	 * Submit the form.
	 * 
	 * @param {string} requestType 
	 * @param {string} url 
	 */
	getImage(requestType, url, redirect = null) {
		return new Promise((resolve, reject) => {
			axios[requestType](url, this.data())
				.then(response => {
					this.onSuccess(response.data, redirect);

					resolve(response.data);
				})
				.catch(error => {
					this.onFail(error.response.data.errors);

					reject(error.response.data.errors);
				})
		});
	}
 

	/**
	 * Handle a successful form submission.
	 * 
	 * @param {object} data 
	 */
	onSuccess(data, redirect = null) {
		if(redirect) {
			window.location.href = redirect;
		} else {
			this.reset();
		}

	}


	/**
	 * Handle a faild form submission.
	 * 
	 * @param {object} errors
	 */
	onFail(errors) {
		this.errors.record(errors);
	}
}

export default Form;