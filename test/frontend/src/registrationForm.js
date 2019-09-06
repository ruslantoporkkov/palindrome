import React from 'react';





class NameForm extends React.Component {
	
	
	
	
	
	
	constructor(props) {
		super(props);
		this.state = {
			value: '',
			items : ''
		};

		this.handleChange = this.handleChange.bind(this);
		this.handleSubmit = this.handleSubmit.bind(this);
	}

	handleChange(event) {
		this.setState({value: event.target.value});
	}

	handleSubmit(event) {

		fetch("http://localhost/process_form_class.php", {
			method: 'POST',
			headers:{ "content-type":"application/x-www-form-urlencoded" },
			body: 'a='+this.state.value
		})
		.then(res => res.json())
		.then((result) => {
			alert(result.status1);
		})

	}


	render() {
		return (
			<form onSubmit={this.handleSubmit}>
				<label>
					Имя:
					<input type="text" value={this.state.value} onChange={this.handleChange} />
				</label>
				<input type="submit" value="Отправить" />
			</form>

		);
	}
	
	
	
	
	

  
  
}

export default NameForm;
