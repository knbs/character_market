import React from "react";

export default class Header extends React.Component{
    state = {
        users: [],
        teams: [],
        userSelected: null,
        teamSelected: null
    }

    componentDidMount() {
        fetch('/api/users').then(async response => {
            const users = await response.json();
            this.setState({users});
        })
    }

    onUsersChange(event) {
        event.preventDefault()
        const userId = parseInt(document.getElementById('users').value);
        const user = this.state.users.find(user => user.id === userId);
        if (!user) {
            this.setState({
                teams: [],
                userSelected: null
            })
            return;
        }

        this.setState({
            teams: user.teams,
            userSelected: user
        })
    }

    onTeamsChange(event) {
        event.preventDefault()
        const teamId = parseInt(document.getElementById('teams').value);
        const team = this.state.teams.find(team => team.id === teamId);
        if (!team) {
            this.setState({
                teamSelected: null
            })
            return;
        }

        this.setState({
            teamSelected: team
        })

    }

    onAddTeamClick(event) {
        const name = prompt("Enter a name for the new team", "WhitOutSpacesPlease");
        const userId = document.getElementById('users').value;
        fetch(`/api/team/${userId}/${name}`,{method: 'POST'}).then(async response => {
            const team = await response.json();
            console.log(team);
            const teams = [...this.state.teams];
            teams.push(team);
            this.setState({teams});
        })
    }

    render() {
        const userList = [<option key={'user0'} value='0'>Select one</option>].concat(
            this.state.users.map(user => <option key={'user' + user.id} value={user.id}>{user.name}</option>)
        );
        const teamList = [<option key={'team0'} value='0'>Select one</option>].concat(
            this.state.teams.map(team => <option key={'user' + team.id} value={team.id}>{team.name}</option>)
        );
        return (
            <header>
                <label htmlFor='users'>Users: </label>
                <select id='users' onChange={event => this.onUsersChange(event)}>
                    {userList}
                </select>
                <label htmlFor='teams'>teams: </label>
                <select id='teams' onChange={event => this.onTeamsChange(event)}>
                    {teamList}
                </select>
                {
                    this.state.userSelected &&
                    <button id='addTeam' onClick={event => this.onAddTeamClick(event)}>Add team</button>
                }&nbsp;&nbsp;&nbsp;&nbsp;
                {
                    this.state.userSelected &&
                    <span>Budget limit: ${this.state.userSelected.budget.total}</span>
                }&nbsp;&nbsp;&nbsp;&nbsp;
                {
                    this.state.userSelected &&
                    <span>Budget spent: ${this.state.userSelected.budget.spent}</span>
                }
                {this.state.teamSelected && <h2>My Team</h2>}
                {
                    this.state.teamSelected &&
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Strength</th>
                            <th>Agility</th>
                            <th>Luck</th>
                        </tr>
                        {this.state.teamSelected.characters.map(character =>
                            <tr>
                                <td>{character.name}</td>
                                <td>{character.metadata.strength}</td>
                                <td>{character.metadata.agility}</td>
                                <td>{character.metadata.luck}</td>
                            </tr>
                        )}
                    </table>
                }
            </header>
        )
    }
}