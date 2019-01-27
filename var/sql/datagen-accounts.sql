-- ----------------------------------------------------------------------------------------
-- accounts creation script
-- used during installation
-- 
-- author: iopietro <https://github.com/iopietro/>
-- ----------------------------------------------------------------------------------------

-- populate user data
INSERT INTO user
   		(id, username, password, tribe, access_level)
	VALUES
		(1, 'Support', '%SUPPORT_PASSWORD%', 1, %SUPPORT_ACCESS_LEVEL%),
		(2, 'Nature', '', 4, 2),
   		(4, 'Taskmaster', '', 1, 2),
   		(5, 'Multihunter', '%MULTIHUNTER_PASSWORD%', %MULTIHUNTER_TRIBE%, %MULTIHUNTER_ACCESS_LEVEL%);
   		
-- populate MH's quest
INSERT INTO quest
		(user_id)
	VALUES
		(5);
		
-- populate MH's ranking
INSERT INTO ranking
		(id)
	VALUES
		(1);
		
INSERT INTO user_ranking
		(user_id, ranking_id)
	VALUES
		(5, 1)