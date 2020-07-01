<?php

namespace EzeRoldan\VoyagerTools\Filters\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * 
 * @method Builder whereKey($id) Add a where clause on the primary key to the query.
 * @method Builder whereKeyNot($id) Add a where clause on the primary key to the query.
 * 
 * @method Builder where($column, $operator = null, $value = null, $boolean = 'and') Add a basic where clause to the query.
 * @method Builder orWhere($column, $operator = null, $value = null) Add an "or where" clause to the query.
 * 
 * @method Builder eagerLoadRelations(array $models) Eager load the relationships for the models.
 * @method Builder getRelation($name) Get the relation instance for the given relation name.
 * 
 * @method Builder scopes($scopes) Call the given local model scopes.
 * @method Builder hasNamedScope($scope) Determine if the given model has a scope.
 * 
 * @method Builder with($relations) Set the relationships that should be eager loaded.
 * @method Builder without($relations) Prevent the specified relations from being eager loaded.
 * 
 * @method Builder withCasts($casts) Apply query-time casts to the model instance.
 * 
 * @method Builder getEagerLoads() Get the relationships being eagerly loaded.
 * @method Builder setEagerLoads(array $eagerLoad) Set the relationships being eagerly loaded.
 * 
 * @method Builder join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false) Add a join clause to the query.
 * @method Builder joinWhere($table, $first, $operator, $second, $type = 'inner') Add a "join where" clause to the query.
 * @method Builder joinSub($query, $as, $first, $operator = null, $second = null, $type = 'inner', $where = false)Add a subquery join clause to the query.
 * 
 * @method Builder leftJoin($table, $first, $operator = null, $second = null) Add a left join to the query.
 * @method Builder leftJoinWhere($table, $first, $operator, $second) Add a "join where" clause to the query.
 * @method Builder leftJoinSub($query, $as, $first, $operator = null, $second = null) Add a subquery left join to the query.
 * 
 * @method Builder rightJoin($table, $first, $operator = null, $second = null) Add a right join to the query.
 * @method Builder rightJoinWhere($table, $first, $operator, $second) Add a "right join where" clause to the query.
 * @method Builder rightJoinSub($query, $as, $first, $operator = null, $second = null) Add a subquery right join to the query.
 * 
 * @method Builder crossJoin($table, $first = null, $operator = null, $second = null) Add a "cross join" clause to the query.
 * 
 * @method Builder mergeWheres($wheres, $bindings) Merge an array of where clauses and bindings.
 * 
 * @method Builder whereColumn($first, $operator = null, $second = null, $boolean = 'and') Add a "where" clause comparing two columns to the query.
 * @method Builder orWhereColumn($first, $operator = null, $second = null) Add an "or where" clause comparing two columns to the query.
 * @method Builder whereRaw($sql, $bindings = [], $boolean = 'and') Add a raw where clause to the query.
 * @method Builder orWhereRaw($sql, $bindings = []) Add a raw or where clause to the query.
 * 
 * @method Builder whereIn($column, $values, $boolean = 'and', $not = false) Add a "where in" clause to the query.
 * @method Builder orWhereIn($column, $values) Add an "or where in" clause to the query.
 * 
 * @method Builder whereNotIn($column, $values, $boolean = 'and') Add a "where not in" clause to the query.
 * @method Builder orWhereNotIn($column, $values) Add an "or where not in" clause to the query.
 * 
 * @method Builder whereIntegerInRaw($column, $values, $boolean = 'and', $not = false) Add a "where in raw" clause for integer values to the query.
 * @method Builder orWhereIntegerInRaw($column, $values) Add an "or where in raw" clause for integer values to the query.
 * @method Builder whereIntegerNotInRaw($column, $values, $boolean = 'and') Add a "where not in raw" clause for integer values to the query.
 * @method Builder orWhereIntegerNotInRaw($column, $values) Add an "or where not in raw" clause for integer values to the query.
 * 
 * @method Builder whereNull($columns, $boolean = 'and', $not = false) Add a "where null" clause to the query.
 * @method Builder orWhereNull($column) Add an "or where null" clause to the query.
 * @method Builder whereNotNull($columns, $boolean = 'and') Add a "where not null" clause to the query.
 * 
 * @method Builder whereBetween($column, array $values, $boolean = 'and', $not = false) Add a where between statement to the query.
 * @method Builder orWhereBetween($column, array $values) Add an or where between statement to the query.
 * @method Builder whereNotBetween($column, array $values, $boolean = 'and') Add a where not between statement to the query.
 * @method Builder orWhereNotBetween($column, array $values) Add an or where not between statement to the query.
 * @method Builder orWhereNotNull($column) Add an "or where not null" clause to the query.
 * 
 * @method Builder whereDate($column, $operator, $value = null, $boolean = 'and') Add a "where date" statement to the query.
 * @method Builder orWhereDate($column, $operator, $value = null) Add an "or where date" statement to the query.
 * 
 * @method Builder whereTime($column, $operator, $value = null, $boolean = 'and') Add a "where time" statement to the query.
 * @method Builder orWhereTime($column, $operator, $value = null) Add an "or where time" statement to the query.
 * 
 * @method Builder whereDay($column, $operator, $value = null, $boolean = 'and') Add a "where day" statement to the query.
 * @method Builder orWhereDay($column, $operator, $value = null) Add an "or where day" statement to the query.
 * 
 * @method Builder whereMonth($column, $operator, $value = null, $boolean = 'and') Add a "where month" statement to the query.
 * @method Builder orWhereMonth($column, $operator, $value = null) Add an "or where month" statement to the query.
 * 
 * @method Builder whereYear($column, $operator, $value = null, $boolean = 'and') Add a "where year" statement to the query.
 * @method Builder orWhereYear($column, $operator, $value = null) Add an "or where year" statement to the query.
 * 
 * @method Builder whereExists(Closure $callback, $boolean = 'and', $not = false) Add an exists clause to the query.
 * @method Builder orWhereExists(Closure $callback, $not = false) Add an or exists clause to the query.
 * @method Builder whereNotExists(Closure $callback, $boolean = 'and') Add a where not exists clause to the query.
 * @method Builder orWhereNotExists(Closure $callback) Add a where not exists clause to the query.
 * 
 * @method Builder addWhereExistsQuery(self $query, $boolean = 'and', $not = false) Add an exists clause to the query.
 * 
 * @method Builder whereRowValues($columns, $operator, $values, $boolean = 'and') Adds a where condition using row values.
 * @method Builder orWhereRowValues($columns, $operator, $values) Adds a or where condition using row values.
 * 
 * @method Builder whereJsonContains($column, $value, $boolean = 'and', $not = false) Add a "where JSON contains" clause to the query.
 * @method Builder orWhereJsonContains($column, $value) Add a "or where JSON contains" clause to the query.
 * @method Builder whereJsonDoesntContain($column, $value, $boolean = 'and') Add a "where JSON not contains" clause to the query.
 * @method Builder orWhereJsonDoesntContain($column, $value) Add a "or where JSON not contains" clause to the query.
 * @method Builder whereJsonLength($column, $operator, $value = null, $boolean = 'and') Add a "where JSON length" clause to the query.
 * @method Builder orWhereJsonLength($column, $operator, $value = null) Add a "or where JSON length" clause to the query.
 * 
 * @method Builder having($column, $operator = null, $value = null, $boolean = 'and') Add a "having" clause to the query.
 * @method Builder orHaving($column, $operator = null, $value = null) Add a "or having" clause to the query.
 * @method Builder havingBetween($column, array $values, $boolean = 'and', $not = false) Add a "having between " clause to the query.
 * @method Builder havingRaw($sql, array $bindings = [], $boolean = 'and') Add a raw having clause to the query.
 * @method Builder orHavingRaw($sql, array $bindings = []) Add a raw or having clause to the query.
 * 
 * @method Builder orderBy($column, $direction = 'asc') Add an "order by" clause to the query.
 * @method Builder orderByDesc($column) Add a descending "order by" clause to the query.
 * @method Builder latest($column = 'created_at') Add an "order by" clause for a timestamp to the query.
 * @method Builder oldest($column = 'created_at') Add an "order by" clause for a timestamp to the query.
 * @method Builder inRandomOrder($seed = '') Put the query's results in random order.
 * @method Builder orderByRaw($sql, $bindings = []) Add a raw "order by" clause to the query.
 * 
 * @method Builder union($query, $all = false) Add a union statement to the query.
 * @method Builder unionAll($query) Add a union all statement to the query.
 * 
 * @method Builder whereLike(string $column, string $string)
 * @method Builder whereBeginsWith(string $column, string $string)
 * @method Builder whereEndsWith(string $column, string $string)
 * 
 */
trait ModelFilterHelper
{
}
