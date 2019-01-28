-- ----------------------------------------------------------------------------------------
-- oasis regeneration script
-- used during installation and server reset
-- 
-- authors: martinambrus <https://github.com/martinambrus/>
--          iopietro <https://github.com/iopietro/>
-- ----------------------------------------------------------------------------------------


-- minimum and maximum number of units for small oasis
SET @minUnitsSmall = 15 * %OASIS_TROOP_MULTIPLIER%;
SET @maxUnitsSmall = 30 * %OASIS_TROOP_MULTIPLIER%;

-- minimum and maximum number of units for medium oasis
SET @minUnitsMedium = 50 * %OASIS_TROOP_MULTIPLIER%;
SET @maxUnitsMedium = 70 * %OASIS_TROOP_MULTIPLIER%;

-- minimum and maximum number of units for big oasis
SET @minUnitsBig = 90 * %OASIS_TROOP_MULTIPLIER%;
SET @maxUnitsBig = 120 * %OASIS_TROOP_MULTIPLIER%;


-- ---------------------------------------------------------------- --
-- update number of units depending on the oasis type               --
-- the more lucrative the oasis is, the better defense will it get  --
-- ---------------------------------------------------------------- --


-- Lumber oasis (+25% wood bonus and +25% wood + 25% crop bonus)
INSERT INTO world_unit_list
	SELECT
		world_id, type, amount
	FROM
		(SELECT
				world.id as world_id, 35 as type, 
				(CASE
					WHEN world.field_type = 13 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 14 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 15 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (13, 14, 15)
        UNION
        SELECT
				world.id as world_id, 36 as type, 
				(CASE
					WHEN world.field_type = 13 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 14 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 15 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (13, 14, 15)
        UNION
        SELECT
				world.id as world_id, 37 as type, 
				(CASE
					WHEN world.field_type = 13 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 14 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 15 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (13, 14, 15)) as o1;
				
-- Clay oasis (+25% clay bonus and +25% clay + 25% crop bonus)
INSERT INTO world_unit_list
	SELECT
		world_id, type, amount
	FROM
		(SELECT
				world.id as world_id, 31 as type, 
				(CASE
					WHEN world.field_type = 16 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 17 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 18 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (16, 17, 18)
        UNION
        SELECT
				world.id as world_id, 32 as type, 
				(CASE
					WHEN world.field_type = 16 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 17 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 18 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (16, 17, 18)
        UNION
        SELECT
				world.id as world_id, 35 as type, 
				(CASE
					WHEN world.field_type = 16 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 17 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 18 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (16, 17, 18)) as o2;
				
-- Iron oasis (+25% iron bonus and +25% iron + 25% crop bonus)
INSERT INTO world_unit_list
	SELECT
		world_id, type, amount
	FROM
		(SELECT
				world.id as world_id, 31 as type, 
				(CASE
					WHEN world.field_type = 19 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 20 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 21 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (19, 20, 21)
        UNION
        SELECT
				world.id as world_id, 32 as type, 
				(CASE
					WHEN world.field_type = 19 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 20 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 21 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (19, 20, 21)
        UNION
        SELECT
				world.id as world_id, 34 as type, 
				(CASE
					WHEN world.field_type = 19 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 20 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
					WHEN world.field_type = 21 THEN FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (19, 20, 21)) as o3;
				
-- Crop oasis (+25% crop bonus)
INSERT INTO world_unit_list
	SELECT
		world_id, type, amount
	FROM
		(SELECT
				world.id as world_id, 31 as type, 
				(CASE
					WHEN world.field_type = 22 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 23 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (22, 23)
        UNION
        SELECT
				world.id as world_id, 33 as type, 
				(CASE
					WHEN world.field_type = 22 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 23 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (22, 23)
        UNION
        SELECT
				world.id as world_id, 37 as type, 
				(CASE
					WHEN world.field_type = 22 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 23 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (22, 23)
		UNION
        SELECT
				world.id as world_id, 39 as type, 
				(CASE
					WHEN world.field_type = 22 THEN FLOOR(@minUnitsSmall + RAND() * (@maxUnitsSmall -  @minUnitsSmall + 1))
					WHEN world.field_type = 23 THEN FLOOR(@minUnitsMedium + RAND() * (@maxUnitsMedium -  @minUnitsMedium + 1))
				 END) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type IN (22, 23)) as o4;
				
-- Crop oasis (+50% crop bonus)
INSERT INTO world_unit_list
	SELECT
		world_id, type, amount
	FROM
		(SELECT
				world.id as world_id, 31 as type, 
				(FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type = 24
        UNION
        SELECT
				world.id as world_id, 33 as type, 
				(FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type = 24
        UNION
        SELECT
				world.id as world_id, 38 as type, 
				(FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type = 24
		UNION
        SELECT
				world.id as world_id, 39 as type, 
				(FLOOR(@minUnitsBig + RAND() * (@maxUnitsBig -  @minUnitsBig + 1))) as amount
			FROM
				oasis INNER JOIN world
			ON
				world.id = oasis.world_id
			WHERE
				world.field_type = 24) as o5