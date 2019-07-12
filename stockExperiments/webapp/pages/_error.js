import React, { Component } from 'react';

class Error extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div>
        <div className="header">
          This page does not exist
        </div>
      </div>
    );
  }
}

export default Error;

