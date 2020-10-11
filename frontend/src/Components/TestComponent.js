import React from 'react'

export default class TestComponent extends React.Component {
    state = {
        welcomeText: 'loading...'
    }

    componentDidMount() {
        fetch('/api').then(async response => {
            this.setState({welcomeText: await response.text()})
        })
    }

    render() {
        return (<h1>{this.state.welcomeText}</h1>)
    }
}