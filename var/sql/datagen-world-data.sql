-- ----------------------------------------------------------------------------------------
-- world map regeneration script
-- used during installation and server reset
-- 
-- authors: martinambrus <https://github.com/martinambrus/>
--          iopietro <https://github.com/iopietro/>
-- ----------------------------------------------------------------------------------------

-- generate world map data
INSERT INTO world

    -- this select gets the right number of columns for the wdata table
    SELECT 0 as id, x, y, field_type, 0 as occupied FROM

        -- this select prepares (i.e. generates) the world data
        (SELECT

            -- save a random number from 1 to 996 into a variable
            @rnd := (FLOOR(1 + RAND() * 996)),

            -- fieldtype is always 3 for the middle and the word border
            IF (
                (x = 0 AND y = 0) OR (x = %WORLD_SIZE% AND y = %WORLD_SIZE%),
                3,
                -- get a field type based on the random number previously generated (1 <= @rnd <= 12 --> village, 13 <= @rnd <= 24 --> oasis) 
                CASE
                    WHEN @rnd <= 10 THEN @ftype := 1
                    WHEN @rnd <= 90 THEN @ftype := 2
                    WHEN @rnd <= 400 THEN @ftype := 3
                    WHEN @rnd <= 480 THEN @ftype := 4
                    WHEN @rnd <= 560 THEN @ftype := 5
                    WHEN @rnd <= 570 THEN @ftype := 6
                    WHEN @rnd <= 600 THEN @ftype := 7
                    WHEN @rnd <= 630 THEN @ftype := 8
                    WHEN @rnd <= 660 THEN @ftype := 9
                    WHEN @rnd <= 740 THEN @ftype := 10
                    WHEN @rnd <= 820 THEN @ftype := 11
                    WHEN @rnd <= 900 THEN @ftype := 12
                    WHEN @rnd <= 908 THEN @ftype := 13
                    WHEN @rnd <= 916 THEN @ftype := 14
                    WHEN @rnd <= 924 THEN @ftype := 15
                    WHEN @rnd <= 932 THEN @ftype := 16
                    WHEN @rnd <= 940 THEN @ftype := 17
                    WHEN @rnd <= 948 THEN @ftype := 18
                    WHEN @rnd <= 956 THEN @ftype := 19
                    WHEN @rnd <= 964 THEN @ftype := 20
                    WHEN @rnd <= 972 THEN @ftype := 21
                    WHEN @rnd <= 980 THEN @ftype := 22
                    WHEN @rnd <= 988 THEN @ftype := 23
                    WHEN @rnd <= 996 THEN @ftype := 24
                END
            ) as field_type,

            -- x and y coordinates come from the subqueries below
            x, y
        FROM

            -- the following select will generate a number from -%WORLD_SIZE% to +%WORLD_SIZE% as an X coordinate
            -- (courtesy of Unreason, https://stackoverflow.com/a/2652051/467164)
            -- this first line will keep incrementing @row until we run out of all the data provided by the "t" subselects below
            (SELECT @row := @row + 1 as x FROM 

            -- t and t2 each contain 10 rows of dummy data,
            -- cartesian product of these is 10^4, i.e. 10000 rows of dummy data
            -- and the outer select is just mysql version of rownumber
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t,
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,

            -- in t3, we only need 9 rows of dummy data, as 400 is currently the maximum allowed map size (i.e. -400 to +400)
            -- which brings us to `t1` x `t2` x `t3` = 10 x 10 x 9 = 900 (we need 900 not 800 because coordinates start at 0,0 not 1,1)
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8) t3,

            -- here we tell MySQL where to start, so if we have a world 100x100, this will set @row to -101
            -- (not -100 because the first select already increments the @row by 1, so we'd start at -99 instead)
            (SELECT @row := (-%WORLD_SIZE% - 1)) as beginning
            ) as x,

            -- this query is the same as previous query for X coordinate but will generate numbers
            -- for the Y coordinate - both of these joined together this way will generate data such as:
            -- -100, 100; -99, 100; -98, 100 ...
            (SELECT @row2 := @row2 - 1 as y FROM 
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t,
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
            (select 0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8) t3,
            (SELECT @row2 := (%WORLD_SIZE% + 1)) as beginning
            ) as y
        WHERE
            x BETWEEN -%WORLD_SIZE% AND %WORLD_SIZE%
            AND
            y BETWEEN -%WORLD_SIZE% AND %WORLD_SIZE%
        ) as generator;

-- populate oasis data
INSERT INTO oasis
    SELECT
        -- automatic ID
        id,
        -- oasis is not conquered
        NULL,
        -- loyalty (100%)
        100,
        -- last updated loyalty date
        NOW(),
        -- last updated units date
        NOW()
    FROM
        world
    WHERE
        field_type >= 13;

-- populate oasis resource data
INSERT INTO resource
    SELECT
        -- oasis world ID
        world_id,
        -- total wood
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- total clay
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- total iron
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- total crop
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- maximum warehouse capacity
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- maximum granary capacity
        400 * %STORAGE_CAPACITY_MULTIPLIER%,
        -- last updated resources date
        NOW()
    FROM
        oasis