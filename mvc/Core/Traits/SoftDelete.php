<?php

namespace Core\Traits;

use Core\Database;

trait SoftDelete
{

    /**
     * Den zum aktuellen Objekt gehörigen Datensatz in der Datenbank als gelöscht markieren.
     *
     * @return bool
     */
    public function delete(): bool
    {
        /**
         * Datenbankverbindung herstellen.
         */
        $database = new Database();
        /**
         * Tabellennamen berechnen.
         */
        $tablename = self::getTablenameFromClassname();

        /**
         * Query ausführen.
         *
         * CURRENT_TIMESTAMP() ist eine Funktion von MySQL, die den aktuellen Zeitstempel zurückgibt.
         */
        $result = $database->query("UPDATE $tablename SET deleted_at = CURRENT_TIME() WHERE id = ?", [
            'i:id' => $this->id
        ]);

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return $result;
    }

    /**
     * Alle Datensätze aus der Datenbank abfragen.
     *
     * Die beiden Funktionsparameter bieten die Möglichkeit die Daten, die abgerufen werden, nach einer einzelnen Spalte
     * aufsteigend oder absteigend direkt über MySQL zu sortieren. Sortierungen sollten, sofern möglich, über die
     * Datenbank durchgeführt werden, weil das wesentlich performanter ist als über PHP.
     *
     * @param string|null $orderBy
     * @param string|null $direction
     *
     * @return array
     */
    public static function all(?string $orderBy = null, ?string $direction = null, ?bool $showDeleted = false): array
    {
        /**
         * Datenbankverbindung herstellen.
         */
        $database = new Database();
        /**
         * Tabellennamen berechnen.
         */
        $tablename = self::getTablenameFromClassname();

        /**
         * Query ausführen.
         *
         * Wurde in den Funktionsparametern eine Sortierung definiert, so wenden wir sie hier an, andernfalls rufen wir
         * alles ohne Sortierung ab.
         *
         * Hier nehmen wir auch Rücksicht auf die deleted_at Spalte und geben nur Einträge zurück, die nicht als
         * gelöscht markiert sind.
         */

        $query = "SELECT * FROM $tablename ";

        if (!$showDeleted) {
            $query = $query . "WHERE deleted_at IS NULL ";
        }

        if ($orderBy === null) {
            $result = $database->query($query);
        } else {
            $result = $database->query("$query ORDER BY $orderBy $direction");
        }
        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return self::handleResult($result);
    }
}
