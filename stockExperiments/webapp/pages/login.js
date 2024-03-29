import React, {Component} from 'react';

class Login extends Component {
  constructor(props) {
    super(props);
    this.state = {
      username: '',
      password: '',
      error: '',
    };

    this.handlePassChange = this.handlePassChange.bind(this);
    this.handleUserChange = this.handleUserChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.dismissError = this.dismissError.bind(this);
  }

  dismissError() {
    this.setState({ error: '' });
  }

  handleSubmit(evt) {
    evt.preventDefault();

    if (!this.state.username) {
      return this.setState({ error: 'Username is required' });
    }

    if (!this.state.password) {
      return this.setState({ error: 'Password is required' });
    }

    return this.setState({ error: '' });
  }

  handleUserChange(evt) {
    this.setState({
      username: evt.target.value,
    });
  };

  handlePassChange(evt) {
    this.setState({
      password: evt.target.value,
    });
  }

  render() {
    // NOTE: I use data-attributes for easier E2E testing
    // but you don't need to target those (any css-selector will work)

    return (
      <div id="main">
        <div className="login-form-wrapper">
          <form className="login-form" onSubmit={this.handleSubmit}>
            <div className="imgcontainer">
              <img src="/appimages/avatar.svg" alt="Avatar" className="avatar" />
            </div>

            <div className="container">
              <label htmlFor="username"><b>Username</b></label>
              <input
                type="text"
                data-test="username"
                value={this.state.username}
                onChange={this.handleUserChange}
                placeholder="Enter Username" name="username"
              />
              <label htmlFor="password"><b>Password</b></label>
              <input
                type="password"
                data-test="password"
                value={this.state.password}
                onChange={this.handlePassChange}
                placeholder="Enter Password" name="password"
              />
                <button type="submit" data-test="submit" >Login</button>
            </div>
            {
              this.state.error &&
              <h3 data-test="error" onClick={this.dismissError}>
                <button onClick={this.dismissError}>✖</button>
                {this.state.error}
              </h3>
            }
          </form>
        </div>
      </div>
    );
  }
}

export default Login;
