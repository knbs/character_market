import React from "react";

export default class Admin extends React.Component {
    state = {
        characters: []
    }

    changeAvailable(id, state) {
        fetch(`/api/character/${id}/available/${state}`, {method: 'POST'}).then(async response => {
            const answer = await response.json();
            if (answer.status === 'error') {
                alert(answer.message)
                return;
            }

            window.location.reload();
        })
    }

    changeMinPrice(id, minPrice) {
        const price = prompt('Enter the min price', minPrice);
        fetch(`/api/character/${id}/min_price/${price}`, {method: 'POST'}).then(async response => {
            const answer = await response.json();
            if (answer.status === 'error') {
                alert(answer.message)
                return;
            }

            window.location.reload();
        })
    }

    changeMaxPrice(id, maxPrice) {
        const price = prompt('Enter the max price', maxPrice);
        fetch(`/api/character/${id}/max_price/${price}`, {method: 'POST'}).then(async response => {
            const answer = await response.json();
            if (answer.status === 'error') {
                alert(answer.message)
                return;
            }

            window.location.reload();
        })
    }

    componentDidMount() {
        fetch('/api/characters').then(async response => {
            const characters = await response.json();
            this.setState({characters});
        })
    }

    render() {
        const charactersList = this.state.characters.map(character =>
            <tr>
                <td>{character.name}</td>
                <td>
                    <button
                        onClick={event => this.changeAvailable(
                            character.id,
                            character.marketData.available == 0 ? '1' : '0'
                        )}
                    >
                        {character.marketData.available == 0 ? 'Not Available' : 'Available ;)'}
                    </button>
                </td>
                <td>
                    <button onClick={event => this.changeMinPrice(character.id, character.marketData.minPrice)}>
                        {character.marketData.minPrice}
                    </button>
                </td>
                <td>
                    <button onClick={event => this.changeMaxPrice(character.id, character.marketData.maxPrice)}>
                        {character.marketData.maxPrice}
                    </button>
                </td>
            </tr>
        )
        return (
            <table>
                <tr>
                    <th>Name</th>
                    <th>Available</th>
                    <th>Min Price</th>
                    <th>Max Price</th>
                </tr>
                {charactersList}
            </table>
        )
    }
}
