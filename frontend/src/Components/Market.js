import React from "react";

export default class Market extends React.Component {
    state = {
        marketItems: []
    }

    buyCharacter(teamId, characterId) {
        if (teamId == 0 || characterId == 0){
            alert('Select a team')
            return;
        }
        fetch(`/api/buy/${teamId}/${characterId}`, {method: 'POST'}).then(async response => {
            const answer = await response.json();
            if (answer.status === 'error') {
                alert(answer.message)
                return;
            }

            window.location.reload(false);
        })
    }

    componentDidMount() {
        fetch('/api/update_market', {method: 'POST'}).then(async response => {
            const marketItems = await response.json();
            this.setState({marketItems});
        })
    }

    render() {
        const marketItemList = this.state.marketItems.map(marketItem =>
            <div style={{display: 'inline-block', margin: '20px', background: 'gray', height:200, width:200}} key={'marketItem'+ marketItem.id}>
                Name: {marketItem.name}<br/>
                Price: ${marketItem.price}<br/>
                <img src={marketItem.photo} alt='Photo' height={100}/><br/>
                <button onClick={event => this.buyCharacter(
                    document.getElementById('teams').value,
                    marketItem.characterId
                )}>BUY</button>
            </div>
        )
        return (
        <main>
            <h2>Buy everything!!!</h2>
                {marketItemList}
        </main>
        )
    }
}