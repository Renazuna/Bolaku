SELECT 
    t.name AS team_name,
    ts.wins,
    ts.draws,
    ts.losses,
    ts.goals_for,
    ts.goals_against
FROM 
    team_stats ts
INNER JOIN 
    team_info t ON ts.team_id = t.id
WHERE 
    t.name IN ('Team A', 'Team B');
